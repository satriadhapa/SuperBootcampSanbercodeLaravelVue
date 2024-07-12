const fs = require('fs').promises;
const path = require('path');

const addSiswa = async (studentName, trainerName) => {
  const filePath = path.join(__dirname, '../data.json');

  try {
    const data = await fs.readFile(filePath, 'utf8');
    let employees = JSON.parse(data);

    const admin = employees.find(emp => emp.role === 'admin' && emp.isLogin);
    if (!admin) throw new Error('Hanya admin yang boleh mendaftarkan siswa');

    const trainer = employees.find(emp => emp.name === trainerName && emp.role === 'trainer');
    if (!trainer) throw new Error('Trainer tidak ditemukan');

    if (!trainer.students) trainer.students = [];
    trainer.students.push({ name: studentName });

    await fs.writeFile(filePath, JSON.stringify(employees, null, 2), 'utf8');
    return 'Berhasil add siswa';
  } catch (err) {
    throw err;
  }
};

module.exports = addSiswa;
