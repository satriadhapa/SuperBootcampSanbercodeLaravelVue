const command = process.argv[2];
switch (command) {
  case 'register':
    require('./register');
    break;
  case 'login':
    require('./login');
    break;
  case 'addSiswa':
    require('./addSiswa');
    break;
  default:
    console.log('Perintah tidak dikenali');
}
