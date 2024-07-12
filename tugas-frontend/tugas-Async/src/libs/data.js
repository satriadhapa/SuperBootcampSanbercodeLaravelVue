const fs = require('fs').promises;
const path = require('path');

const filePath = path.join(__dirname, '../data.json');

const readData = async () => {
  try {
    const data = await fs.readFile(filePath, 'utf8');
    return JSON.parse(data);
  } catch (err) {
    console.error('Error reading data:', err);
    throw err;
  }
};

const writeData = async (data) => {
  try {
    await fs.writeFile(filePath, JSON.stringify(data, null, 2));
  } catch (err) {
    console.error('Error writing data:', err);
    throw err;
  }
};

module.exports = {
  readData,
  writeData
};
