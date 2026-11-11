import os, re, sys, urllib.parse

ROOT = sys.argv[1] if len(sys.argv) > 1 else '.'
APPLY = '--apply' in sys.argv
PIC = os.path.join(ROOT, 'picture')

TR = dict(zip('абвгдеёжзийклмнопрстуфхцчшщъыьэюя', ['a','b','v','g','d','e','e','zh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','ts','ch','sh','sch','','y','','e','yu','ya']))

def slug(name):
    base, ext = os.path.splitext(name)
    out = ''.join(TR.get(ch, ch) for ch in base.lower())
    out = re.sub(r'[^a-z0-9]+', '-', out).strip('-') or 'img'
    return out, ext.lower()

mapping, used = {}, set()
for name in sorted(os.listdir(PIC)):
    if not os.path.isfile(os.path.join(PIC, name)):
        continue
    base, ext = slug(name)
    new = base + ext
    i = 0
    while new in used or (new != name and os.path.exists(os.path.join(PIC, new)) and new not in mapping.values() and new.lower() != name.lower()):
        i += 1
        new = '%s-%d%s' % (base, i, ext)
    used.add(new)
    if new != name:
        mapping[name] = new

for old, new in mapping.items():
    print(old, '->', new)
print('files to rename:', len(mapping))

if not APPLY:
    print('dry run, add --apply to rename and update references')
    sys.exit(0)

for old, new in mapping.items():
    os.rename(os.path.join(PIC, old), os.path.join(PIC, new))

targets = []
for dirpath, dirs, files in os.walk(ROOT):
    dirs[:] = [d for d in dirs if d not in ('.git', 'node_modules', 'picture')]
    for f in files:
        if f.endswith(('.html', '.css', '.js', '.xml', '.php')):
            targets.append(os.path.join(dirpath, f))

pairs = sorted(mapping.items(), key=lambda kv: -len(kv[0]))
for path in targets:
    with open(path, encoding='utf-8', newline='') as fh:
        text = fh.read()
    orig = text
    for old, new in pairs:
        for variant in {old, urllib.parse.quote(old), urllib.parse.quote(old, safe='/%()'), old.replace(' ', '%20')}:
            text = text.replace('picture/' + variant, 'picture/' + new)
    if text != orig:
        with open(path, 'w', encoding='utf-8', newline='') as fh:
            fh.write(text)
        print('updated', path)