const fs = require('fs').promises;
const path = require('path');

const login = async (name, password) => {
  const filePath = path.join(__dirname, '../data.json');

  try {
    const data = await fs.readFile(filePath, 'utf8');
    let employees = JSON.parse(data);

    const employee = employees.find(emp => emp.name === name && emp.password === password);
    if (!employee) throw new Error('Karyawan tidak ditemukan atau password salah');

    employee.isLogin = true;

    await fs.writeFile(filePath, JSON.stringify(employees, null, 2), 'utf8');
    return 'Berhasil Login';
  } catch (err) {
    throw err;
  }
};

module.exports = login;
