// Soal Conditional
// Jawaban Soal if-else

var nama = "hamdani"; 
var peran = "werewolf";    

if (nama === "") {
    console.log("Nama harus diisi!");
} else if (peran === "") {
    console.log("Halo " + nama + ", Pilih peranmu untuk memulai game!");
} else {
    console.log("Selamat datang di Dunia Werewolf, " + nama);

    if (peran.toLowerCase() === "penyihir") {
        console.log("Halo Penyihir " + nama + ", kamu dapat melihat siapa yang menjadi werewolf!");
    } else if (peran.toLowerCase() === "guard") {
        console.log("Halo Guard " + nama + ", kamu akan membantu melindungi temanmu dari serangan werewolf.");
    } else if (peran.toLowerCase() === "werewolf") {
        console.log("Halo Werewolf " + nama + ", Kamu akan memakan mangsa setiap malam!");
    } else {
        console.log("Peran tidak dikenali, pilih peran yang benar!");
    }
}

