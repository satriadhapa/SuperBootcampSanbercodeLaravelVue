function bintangpagar(angka) {
    for (var i = 1; i <= angka; i++) {
        var baris = '';
        for (var j = 1; j <= i; j++) {
            if (j % 2 === 1) {
                baris += '*';
            } else {
                baris += ' #';
            }
        }
        console.log(baris.trim());
    }
}

// TEST CASES
bintangpagar(3);
console.log('================');
bintangpagar(5);