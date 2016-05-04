Vue.filter('limitTitle', function(value) {
    if(value.length > 30) {
        value = value.substring(0, 30) + '...';
    }
    return value;
});
