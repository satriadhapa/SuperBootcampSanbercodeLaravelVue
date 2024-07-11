const register = require('./libs/register');

const args = process.argv.slice(2);
const command = args[0];
const [name, password, role] = args[1].split(',');

if (command === 'register') {
  register(name, password, role, (err, message) => {
    if (err) console.error(err);
    else console.log(message);
  });
}

const login = require('./libs/login');

if (command === 'login') {
  login(name, password)
    .then(message => console.log(message))
    .catch(err => console.error(err));
}
