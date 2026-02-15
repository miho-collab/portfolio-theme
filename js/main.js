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

// TOPのリード文アニメーションと自己紹介以降のコンテンツフェードイン
window.addEventListener('DOMContentLoaded', () => {
  const lead = document.getElementById('lead');
  const disc = document.getElementById('disc');
  const mainContents = document.getElementById('mainContents');

  if (lead && disc) {
    const text = lead.textContent.trim();
    lead.textContent = '';

    [...text].forEach((char, i) => {
      const span = document.createElement('span');
      span.textContent = char;
      span.style.animation = `fadeInUp 0.2s ease forwards`;
      span.style.animationDelay = `${i * 0.08}s`;
      lead.appendChild(span);
    });

    const delay = Math.max(0, text.length * 0.1 - 1); // 文字アニメーションの後にdisc以下を表示させるタイミング調整

    setTimeout(() => {
      disc.classList.add('appear');
      if (mainContents) mainContents.classList.add('appear');
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

// WORKS メインタイトル 自動縮小処理
function shrinkToFit(el, minPx = 14) {
	if (!el) return;

	let size = parseFloat(getComputedStyle(el).fontSize);
	let guard = 80;

	// はみ出している間だけ 1px ずつ縮める
	while (el.scrollWidth > el.clientWidth && size > minPx && guard-- > 0) {
		size -= 1;
		el.style.fontSize = size + 'px';
	}
}

function applyShrink() {
	document.querySelectorAll('.works__mainTitle').forEach((el) => {
		// リセットしてから縮め直す（リサイズ時に重要）
		el.style.fontSize = '';
		shrinkToFit(el, 14); // 最小フォントサイズはここで調整
	});
}

window.addEventListener('load', applyShrink);
window.addEventListener('resize', applyShrink);