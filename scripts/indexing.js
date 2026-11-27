/**
 * Открывает / закрывает сайт для поисковиков.
 *   npm run site:open   -> robots.txt: Allow + SITE_INDEX=true  в .env
 *   npm run site:close  -> robots.txt: Disallow: / + SITE_INDEX=false в .env
 * После изменения .env выполните: php artisan config:clear
 */
const fs = require('fs');
const path = require('path');

const mode = process.argv[2];
if (!['open', 'close'].includes(mode)) {
  console.error('Использование: node scripts/indexing.js open|close');
  process.exit(1);
}

const root = path.join(__dirname, '..');
const BASE = (process.env.APP_PUBLIC_URL || 'https://topchef.ru').replace(/\/$/, '');

const robots = mode === 'open'
  ? `User-agent: *\nAllow: /\nDisallow: /lead\n\nSitemap: ${BASE}/sitemap.xml\n`
  : `User-agent: *\nDisallow: /\n`;
fs.writeFileSync(path.join(root, 'public', 'robots.txt'), robots);

const envPath = path.join(root, '.env');
if (fs.existsSync(envPath)) {
  let env = fs.readFileSync(envPath, 'utf8');
  const line = `SITE_INDEX=${mode === 'open' ? 'true' : 'false'}`;
  env = /^SITE_INDEX=.*$/m.test(env) ? env.replace(/^SITE_INDEX=.*$/m, line) : env.replace(/\s*$/, '\n') + line + '\n';
  fs.writeFileSync(envPath, env);
}

console.log(mode === 'open' ? 'Сайт ОТКРЫТ для индексации' : 'Сайт ЗАКРЫТ от индексации');
