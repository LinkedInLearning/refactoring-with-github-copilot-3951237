function findDuplicates(arr) {
  const duplicates = [];

  for (let i = 0; i < arr.length; i++) {
    for (let j = i + 1; j < arr.length; j++) {
      if (arr[i] === arr[j] && !duplicates.includes(arr[i])) {
        duplicates.push(arr[i]);
      }
    }
  }

  return duplicates;
}

const largeArray = [1, 2, 3, 4, 5, 2, 3, 6, 7, 8, 9, 3, 2, 10, 11, 1];
console.log(findDuplicates(largeArray));