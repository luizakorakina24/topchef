const fs = require('fs');
const path = require('path');

const BASE = 'https://topchef.ru';
const pages = [
  { file: '',               priority: '1.0', changefreq: 'weekly'  },
  { file: 'menu.html',      priority: '0.8', changefreq: 'monthly' },
  { file: 'promo.html',     priority: '0.8', changefreq: 'weekly'  },
  { file: 'services.html',  priority: '0.8', changefreq: 'monthly' },
  { file: 'jobs.html',      priority: '0.7', changefreq: 'monthly' },
  { file: 'privacy.html',   priority: '0.3', changefreq: 'yearly'  },
  { file: 'agreement.html', priority: '0.3', changefreq: 'yearly'  },
];

const today = new Date().toISOString().slice(0, 10);
const urls = pages.map(p => `  <url>
    <loc>${BASE}/${p.file}</loc>
    <lastmod>${today}</lastmod>
    <changefreq>${p.changefreq}</changefreq>
    <priority>${p.priority}</priority>
  </url>`).join('\n');

fs.writeFileSync(
  path.join(__dirname, '..', 'sitemap.xml'),
  `<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n${urls}\n</urlset>`
);
console.log('sitemap.xml updated:', today);