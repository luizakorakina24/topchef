<?php

namespace App\Console\Commands;

use App\Models\Lead;
use Illuminate\Console\Command;

class ListLeads extends Command
{
    protected $signature = 'leads:list {--limit=20 : Сколько последних заявок показать}';

    protected $description = 'Показать последние заявки с сайта';

    public function handle(): int
    {
        $rows = Lead::latest()
            ->limit((int) $this->option('limit'))
            ->get()
            ->map(fn (Lead $lead) => [
                $lead->id,
                $lead->created_at->format('d.m.Y H:i'),
                $lead->name,
                $lead->phone,
                $lead->service_type ?? '-',
                $lead->page,
                $lead->mailed_at ? 'да' : 'нет',
            ])
            ->all();

        $this->table(['ID', 'Дата', 'Имя', 'Телефон', 'Услуга', 'Страница', 'Письмо'], $rows);

        return self::SUCCESS;
    }
}
