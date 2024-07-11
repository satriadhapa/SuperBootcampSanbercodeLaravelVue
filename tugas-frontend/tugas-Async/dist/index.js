// node_modules
// index.js

function naikAngkot(listpenumpang){
    rute = ['a', 'b','c', 'd','e', 'f'];
    hasil = [];
    
    
    for(let i = 0; i < listpenumpang.length; i++){
        let penumpang = listpenumpang[i][0];
        let naikDari = listpenumpang[i][1];
        let tujuan = listpenumpang[i][2];
    
        let naikIndex = rute.indexOf(naikDari);
        let tujuanIndex = rute.indexOf(tujuan);
        let bayar = (tujuanIndex-naikIndex) * 2000;
    
        hasil.push({
            penumpang:penumpang,
            naik_dari:naikDari,
            tujuan:tujuan,
            tarif:bayar
        });
    }
    return hasil
}

//tes

console.log(naikAngkot([['resa', 'b','e'], ['alma', 'a', 'f']]));

console.log(naikAngkot([]));