var $j = jQuery.noConflict();

$j(document).ready(function () {
$j('a[rel*=external]').click( function() {
    window.open(this.href);
    return false;
});
});