const CLASS_ACTIVE = "active";
const CLASS_HAS_DROPDOWN = "menu-item-has-children";
const CLASS_SHOW = "show";
const ARIA_EXPANDED = "aria-expanded";

const subMenuAnchorAttrs = {
	role: "button",
	"data-toggle": "dropdown",
	"aria-haspopup": true,
	[ARIA_EXPANDED]: false,
};

function setupSubMenu(els) {
	const attrKeys = Object.keys(subMenuAnchorAttrs);
	els = Array.from(els);
	els.forEach(el =>
		attrKeys.forEach(key => el.setAttribute(key, subMenuAnchorAttrs[key]))
	);
}

function toggleMenu(el, isToggled = true) {
	const toggleClass = isToggled ? el.classList.remove : el.classList.add;
	const submenu = el.nextElementSibling;

	el.setAttribute(ARIA_EXPANDED, !isToggled);
	toggleClass.bind(el.classList, CLASS_SHOW)();
	toggle(submenu);
}

function hoverClickHandler(evt) {
	const self = evt.target;
	const isToggled = self.getAttribute(ARIA_EXPANDED) === "true";
	const submenu = self.nextElementSibling;

	evt.preventDefault();
	toggleMenu(self, isToggled);
}

const toggle = el => {
	if (el) {
		el.style.display = el.style.display === "block" ? "" : "block";
	}
};

document.addEventListener("DOMContentLoaded", () => {
	setupSubMenu(
		document.querySelectorAll(`[data-id=nav] .${CLASS_HAS_DROPDOWN} > a`)
	);
	const btnEl = document.querySelector("[data-toggle=mobile-nav]");
	const subMenuAnchors = Array.from(
		document.querySelectorAll("[data-toggle=dropdown]")
	);

	btnEl.addEventListener("click", () => {
		toggle(document.querySelector(".main-nav"));
		toggle(document.querySelector(".top-nav"));

		if (btnEl.classList.contains(CLASS_ACTIVE)) {
			btnEl.classList.remove(CLASS_ACTIVE);
			btnEl.setAttribute(ARIA_EXPANDED, false);
		} else {
			btnEl.classList.add(CLASS_ACTIVE);
			btnEl.setAttribute(ARIA_EXPANDED, true);
		}
	});

	subMenuAnchors.forEach(anchor => {
		anchor.addEventListener("click", hoverClickHandler);
	});
});
