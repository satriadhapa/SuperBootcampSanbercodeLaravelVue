const fs = require('fs');
const path = require('path');

const register = (name, password, role, callback) => {
  const filePath = path.join(__dirname, '../data.json');
  
  fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) return callback(err);

    let employees = JSON.parse(data);
    const newEmployee = {
      name,
      password,
      role,
      isLogin: false
    };
    employees.push(newEmployee);

    fs.writeFile(filePath, JSON.stringify(employees, null, 2), 'utf8', (err) => {
      if (err) return callback(err);
      callback(null, 'Berhasil register');
    });
  });
};

module.exports = register;