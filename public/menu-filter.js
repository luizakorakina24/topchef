/**
 * Поиск и фильтр блюд на странице меню.
 * - строка поиска ищет по названию, составу и цене карточек и строк прайса;
 * - кнопки-разделы строятся автоматически из заголовков секций (язык берётся со страницы);
 * - без JavaScript блок поиска скрыт, меню остаётся полностью доступным.
 */
(function () {
    'use strict';

    const root = document.getElementById('menuFilter');
    if (!root) return;

    const input = root.querySelector('.menu-filter__search');
    const chipsBox = root.querySelector('.menu-filter__chips');
    const emptyMsg = root.querySelector('.menu-filter__empty');
    const HIDE = 'is-filtered-out';

    // нижний регистр, ё -> е, лишние пробелы убираем
    const normalize = (s) => (s || '').toLowerCase().replace(/ё/g, 'е').replace(/\s+/g, ' ').trim();

    // ---- собираем разделы меню и их карточки ----
    const sections = Array.from(document.querySelectorAll('.menu-section[id]')).map((section) => {
        const isPrice = section.id === 'pastry-price';
        const nodes = Array.from(section.querySelectorAll(isPrice ? 'li' : '.menu-card, .promo-card'));
        if (!nodes.length) return null;

        const headings = section.querySelectorAll('h2');
        const container = section.querySelector('.container');
        const priceGrid = isPrice ? container.querySelector(':scope > div') : null;

        return {
            el: section,
            id: section.id,
            title: headings.length ? headings[headings.length - 1].textContent.trim() : section.id,
            hasH1: !!section.querySelector('h1'),
            // всё содержимое раздела, кроме H1 и самой панели фильтра
            blocks: Array.from(container.children).filter((c) => !c.matches('h1, #menuFilter')),
            columns: priceGrid ? Array.from(priceGrid.children) : null,
            items: nodes.map((n) => {
                const img = n.querySelector('img');
                return { el: n, text: normalize(n.textContent + ' ' + (img ? img.alt : '')) };
            })
        };
    }).filter(Boolean);

    if (!sections.length) return;

    let active = 'all';

    // ---- кнопки разделов ----
    function addChip(id, label) {
        const b = document.createElement('button');
        b.type = 'button';
        b.className = 'menu-filter__chip';
        b.dataset.filter = id;
        b.textContent = label;
        b.setAttribute('aria-pressed', 'false');
        chipsBox.appendChild(b);
    }
    addChip('all', root.getAttribute('data-all') || 'All');
    sections.forEach((s) => addChip(s.id, s.title));

    function markActive() {
        chipsBox.querySelectorAll('.menu-filter__chip').forEach((b) => {
            const on = b.dataset.filter === active;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-pressed', on ? 'true' : 'false');
        });
    }

    // ---- применяем поиск и выбранный раздел ----
    function apply() {
        const q = normalize(input.value);
        let total = 0;

        sections.forEach((s) => {
            const inChip = active === 'all' || active === s.id;
            let shown = 0;

            s.items.forEach((it) => {
                const ok = inChip && (!q || it.text.indexOf(q) !== -1);
                it.el.classList.toggle(HIDE, !ok);
                if (ok) shown++;
            });

            // в прайсе скрываем колонку, если в ней не осталось строк
            if (s.columns) {
                s.columns.forEach((col) => col.classList.toggle(HIDE, !col.querySelector('li:not(.' + HIDE + ')')));
            }

            total += shown;
            if (s.hasH1) {
                s.blocks.forEach((b) => b.classList.toggle(HIDE, shown === 0)); // заголовок H1 остаётся на месте
            } else {
                s.el.classList.toggle(HIDE, shown === 0);
            }
        });

        emptyMsg.hidden = total > 0;
    }

    let timer = null;
    input.addEventListener('input', () => {
        clearTimeout(timer);
        timer = setTimeout(apply, 120);
    });

    chipsBox.addEventListener('click', (e) => {
        const b = e.target.closest('.menu-filter__chip');
        if (!b) return;
        active = b.dataset.filter;
        markActive();
        apply();
    });

    markActive();
    apply();
    root.classList.add('is-ready');
})();
