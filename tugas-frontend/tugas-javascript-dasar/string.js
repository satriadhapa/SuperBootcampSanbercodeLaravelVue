// Soal String
// Jawaban Soal 1

var word = 'JavaScript'; 
var second = 'is'; 
var third = 'awesome'; 
var fourth = 'and'; 
var fifth = 'I'; 
var sixth = 'love'; 
var seventh = 'it!';

var joinKata = word + ' ' + second + ' ' + third + ' ' + fourth + ' ' + fifth + ' ' + sixth + ' ' + seventh;
console.log(joinKata);

// Jawaban Soal 2

var kata = "I am going to be Web Developer";

var exampleFirstWord = kata[0];
var secondWord = kata[2] + kata[3];
var thirdWord = kata.slice(5, 10);
var fourthWord = kata.slice(11, 13);
var fifthWord = kata.slice(14, 16);
var sixthWord = kata.slice(17, 20);
var seventhWord = kata.slice(21, 30);

console.log('First Word: ' + exampleFirstWord);
console.log('Second Word: ' + secondWord);
console.log('Third Word: ' + thirdWord);
console.log('Fourth Word: ' + fourthWord);
console.log('Fifth Word: ' + fifthWord);
console.log('Sixth Word: ' + sixthWord);
console.log('Seventh Word: ' + seventhWord);

// Jawaban Soal 3

var kata3 = 'wow JavaScript is so cool';

var exampleFirstWord3 = kata3.substring(0, 3);
var secondWord3 = kata3.substring(4, 14);
var thirdWord3 = kata3.substring(15, 17);
var fourthWord3 = kata3.substring(18, 20);
var fifthWord3 = kata3.substring(21, 25);

var firstWordLength = exampleFirstWord3.length;
var secondWordLength = secondWord3.length;
var thirdWordLength = thirdWord3.length;
var fourthWordLength = fourthWord3.length;
var fifthWordLength = fifthWord3.length;

console.log('First Word: ' + exampleFirstWord3 + ', with length: ' + firstWordLength);
console.log('Second Word: ' + secondWord3 + ', with length: ' + secondWordLength);
console.log('Third Word: ' + thirdWord3 + ', with length: ' + thirdWordLength);
console.log('Fourth Word: ' + fourthWord3 + ', with length: ' + fourthWordLength);
console.log('Fifth Word: ' + fifthWord3 + ', with length: ' + fifthWordLength);
