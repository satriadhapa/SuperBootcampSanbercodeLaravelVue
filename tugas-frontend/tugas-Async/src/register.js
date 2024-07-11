const fs = require('fs');
const path = require('path');

const filePath = path.join(__dirname, 'data.json');
const [name, password, role] = process.argv.slice(2)[0].split(',');

const register = (name, password, role, callback) => {
  fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) return callback(err);
    const employees = JSON.parse(data);
    employees.push({ name, password, role, isLogin: false });
    fs.writeFile(filePath, JSON.stringify(employees, null, 2), (err) => {
      if (err) return callback(err);
      callback(null, 'Berhasil register');
    });
  });
};

register(name, password, role, (err, message) => {
  if (err) console.error(err);
  else console.log(message);
});
