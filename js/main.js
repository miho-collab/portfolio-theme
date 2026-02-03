// ハンバーガーメニューアニメーション
document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".js-headerHamburger");
  const spNav = document.querySelector(".js-headerSpNav");

  if (!hamburger || !spNav) return;

  // ハンバーガークリックで開閉
  hamburger.addEventListener("click", function (e) {
    e.preventDefault();

    hamburger.classList.toggle("header__hamburger--active");
    spNav.classList.toggle("header__spNav--open");
  });

  // ▼ ここから追加：メニュー内のリンクをクリックしたら閉じる
  const spNavLinks = spNav.querySelectorAll("a");

  spNavLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      // 開いていたら閉じる
      hamburger.classList.remove("header__hamburger--active");
      spNav.classList.remove("header__spNav--open");
    });
  });
});

// リードアニメーション
window.addEventListener('DOMContentLoaded', () => {
  // リードのアニメーション
  const lead = document.getElementById('lead');
  const disc = document.getElementById('disc');
  if (lead && disc) {
    const text = lead.textContent.trim();
    lead.textContent = '';
    [...text].forEach((char, i) => {
      const span = document.createElement('span');
      span.textContent = char;
      span.style.animation = `fadeInUp 0.3s ease forwards`;
      span.style.animationDelay = `${i * 0.1}s`;
      lead.appendChild(span);
    });
    const delay = text.length * 0.1 + 0.5;
    setTimeout(() => {
      disc.classList.add('appear');
    }, delay * 1000);
  }
});

// 自己紹介 ReadMore 開閉
const readMoreBtn = document.getElementById('aboutReadMore');
const descWrapper = document.getElementById('aboutDescriptionWrapper');
const desc = document.getElementById('aboutDescription');

if (!readMoreBtn || !descWrapper || !desc) {
  // 要素がなければ何もしない
} else {
  let expanded = false;

  readMoreBtn.addEventListener('click', () => {
    expanded = !expanded;

    if (expanded) {
      // 開くとき：ゆっくり
      descWrapper.classList.remove('is-closing');
      descWrapper.classList.add('is-opening');
      desc.setAttribute('aria-hidden', 'false');
      readMoreBtn.textContent = 'Read Less';
      readMoreBtn.setAttribute('aria-expanded', 'true');
      desc.focus();
    } else {
      // 閉じるとき：速く
      descWrapper.classList.remove('is-opening');
      descWrapper.classList.add('is-closing');
      desc.setAttribute('aria-hidden', 'true');
      readMoreBtn.textContent = 'Read More';
      readMoreBtn.setAttribute('aria-expanded', 'false');
    }
  });

  // Escキーで閉じる
  document.addEventListener('keydown', (e) => {
    if (expanded && e.key === 'Escape') {
      expanded = false;
      descWrapper.classList.remove('is-opening');
      descWrapper.classList.add('is-closing');
      desc.setAttribute('aria-hidden', 'true');
      readMoreBtn.textContent = 'Read More';
      readMoreBtn.setAttribute('aria-expanded', 'false');
      readMoreBtn.focus();
    }
  });

  // 外側クリックで閉じる
  document.addEventListener('click', (e) => {
    if (
      expanded &&
      !descWrapper.contains(e.target) &&
      !readMoreBtn.contains(e.target)
    ) {
      expanded = false;
      descWrapper.classList.remove('is-opening');
      descWrapper.classList.add('is-closing');
      desc.setAttribute('aria-hidden', 'true');
      readMoreBtn.textContent = 'Read More';
      readMoreBtn.setAttribute('aria-expanded', 'false');
    }
  });
}

// WORKS works__item  クリック領域を丸ごとリンク化
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.works__item').forEach(function(item) {
    item.addEventListener('click', function(e) {
      // 内部の a をクリックしたときは a に従う（必須）
      if (e.target.closest('a')) return;

      const url = this.dataset.url;
      if (url) window.open(url, '_blank');
    });
  });
});
// WORKS works__item  カーソル追従ツールチップ＜サイトへ＞表示 
document.addEventListener('DOMContentLoaded', () => {
  const tooltip = document.getElementById('cursorTooltip');
  if (!tooltip) return;

  let hideTimer;

  function showTooltip(text, e) {
    if (!text) return;

    tooltip.textContent = text;
    tooltip.style.opacity = 1;
    tooltip.style.left = `${e.clientX}px`;
    tooltip.style.top = `${e.clientY}px`;

    clearTimeout(hideTimer);
    hideTimer = setTimeout(() => {
      tooltip.style.opacity = 0;
    }, 550);
  }

  function hideTooltip() {
    clearTimeout(hideTimer);
    tooltip.style.opacity = 0;
  }

  // ★ ここがポイント：document 1つだけに mousemove を付けて、
  //   その場その場で「一番近い対象」を判定する
  document.addEventListener('mousemove', (e) => {
    const link = e.target.closest('.js-tooltip-link');
    const card = e.target.closest('.works__item[data-url]:not([data-url=""])');

    if (link) {
      // テキストリンク上：リンクの文字 + 「へ」
      const labelText = link.textContent.trim();
      const label = labelText ? `${labelText}へ` : 'サイトへ';
      showTooltip(label, e);
    } else if (card) {
      // カード上：data-sitename + 「へ」
      const siteName = card.dataset.sitename
        ? `${card.dataset.sitename}へ`
        : 'サイトへ';
      showTooltip(siteName, e);
    } else {
      // どちらの上でもないときは非表示
      hideTooltip();
    }
  });
});

// 配列の中から偶数だけを抽出する関数
function getEvenNumbers(numbers) {
  return numbers.filter(num => num % 2 === 0);
}

/* WORKS works__itemの行数を判定してクラス付与
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.works__title').forEach(function (title) {

    const style = getComputedStyle(title);

    // line-height（px）
    let lineHeight = parseFloat(style.lineHeight);

    // 高さ（border + padding込み）
    const rectHeight = title.getBoundingClientRect().height;

    // padding を引いて「中身の高さ」だけにする
    const paddingTop = parseFloat(style.paddingTop) || 0;
    const paddingBottom = parseFloat(style.paddingBottom) || 0;
    const contentHeight = rectHeight - paddingTop - paddingBottom;

    const lines = Math.round(contentHeight / lineHeight);

    if (lines > 1) {
      title.classList.add('is-multiline');
    } else {
      title.classList.add('is-singleline');
    }
  });
});*/

