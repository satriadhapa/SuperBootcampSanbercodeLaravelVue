const fs = require('fs').promises;
const path = require('path');

const filePath = path.join(__dirname, 'data.json');
const [name, password] = process.argv.slice(2)[0].split(',');

const login = (name, password) => {
  return fs.readFile(filePath, 'utf8')
    .then(data => {
      const employees = JSON.parse(data);
      const employee = employees.find(emp => emp.name === name && emp.password === password);
      if (!employee) throw new Error('Login gagal');
      employee.isLogin = true;
      return fs.writeFile(filePath, JSON.stringify(employees, null, 2));
    })
    .then(() => 'Berhasil login')
    .catch(err => Promise.reject(err));
};

login(name, password)
  .then(message => console.log(message))
  .catch(err => console.error(err));
