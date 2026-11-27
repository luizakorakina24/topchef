<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Mail\LeadReceived;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Приём заявок с форм сайта: проверка -> сохранение в БД -> письмо менеджеру.
 */
class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): JsonResponse
    {
        // Ловушка для ботов: человек это поле не видит и не заполняет.
        if ($request->filled('website')) {
            return response()->json(['ok' => true]);
        }

        $data = collect($request->validated())
            ->except('website')
            ->map(fn ($value) => is_string($value) ? trim(strip_tags($value)) : $value)
            ->all();

        $lead = Lead::create($data + [
            'ip'         => $request->ip(),
            'user_agent' => Str::limit((string) $request->userAgent(), 250, ''),
        ]);

        $this->notifyManager($lead);

        return response()->json(['ok' => true]);
    }

    /** Письмо не должно ломать приём заявки: ошибка почты пишется в лог, заявка уже в базе. */
    private function notifyManager(Lead $lead): void
    {
        $to = config('leads.to');

        if (! $to) {
            return;
        }

        try {
            Mail::to($to)->send(new LeadReceived($lead));
            $lead->update(['mailed_at' => now()]);
        } catch (\Throwable $e) {
            report($e);
        }
    }
}
