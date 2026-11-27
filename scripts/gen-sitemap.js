/**
 * Генерирует public/sitemap.xml: чистые адреса (без .html) и английские версии с hreflang.
 * Запуск: npm run sitemap
 */
const fs = require('fs');
const path = require('path');

const BASE = (process.env.APP_PUBLIC_URL || 'https://topchef.ru').replace(/\/$/, '');

// path - адрес русской версии; en - адрес английской версии (если она есть)
const pages = [
  { path: '/',          en: '/en',      priority: '1.0', changefreq: 'weekly'  },
  { path: '/menu',      en: '/en/menu', priority: '0.8', changefreq: 'monthly' },
  { path: '/promo',     priority: '0.8', changefreq: 'weekly'  },
  { path: '/services',  priority: '0.8', changefreq: 'monthly' },
  { path: '/jobs',      priority: '0.7', changefreq: 'monthly' },
  { path: '/privacy',   priority: '0.3', changefreq: 'yearly'  },
  { path: '/agreement', priority: '0.3', changefreq: 'yearly'  },
];

const today = new Date().toISOString().slice(0, 10);
const loc = (p) => BASE + (p === '/' ? '/' : p);

function entry(url, p, lang) {
  const alternates = p.en
    ? `\n    <xhtml:link rel="alternate" hreflang="ru" href="${loc(p.path)}"/>` +
      `\n    <xhtml:link rel="alternate" hreflang="en" href="${loc(p.en)}"/>` +
      `\n    <xhtml:link rel="alternate" hreflang="x-default" href="${loc(p.path)}"/>`
    : '';
  return `  <url>\n    <loc>${loc(url)}</loc>\n    <lastmod>${today}</lastmod>\n    <changefreq>${p.changefreq}</changefreq>\n    <priority>${p.priority}</priority>${alternates}\n  </url>`;
}

const urls = [];
pages.forEach((p) => {
  urls.push(entry(p.path, p));
  if (p.en) urls.push(entry(p.en, p));
});

const xml = `<?xml version="1.0" encoding="UTF-8"?>\n` +
  `<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">\n` +
  `${urls.join('\n')}\n</urlset>\n`;

fs.writeFileSync(path.join(__dirname, '..', 'public', 'sitemap.xml'), xml);
console.log('public/sitemap.xml updated:', today, '(' + urls.length + ' urls)');
