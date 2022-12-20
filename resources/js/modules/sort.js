export default function sortMenu() {
    $(".navbar-nav > li").detach().sort(function(a, b) {
		return +a.id.replace("sort-","") - b.id.replace("sort-","") ;
	}).appendTo("ul.navbar-nav");
	$(".navbar-nav > li").detach().sort(function(a, b) {
		return +a.id.replace("sort-item-","") - b.id.replace("sort-item-","") ;
	}).appendTo("ul.navbar-nav");
	$(".nav-box-left > li").detach().sort(function(a, b) {
		return +a.id.replace("sort-item-mobile-","") - b.id.replace("sort-item-mobile-","") ;
	}).appendTo("ul.nav-box-left");
}