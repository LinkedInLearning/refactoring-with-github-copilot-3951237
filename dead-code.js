function calculateDiscount(price, isMember) {
  let discount = 0;

  if (price > 100) {
    discount = 0.1; // 10% discount for orders over $100
  }

  if (isMember) {
    discount += 0.05; // Extra 5% discount for members
  }

  if (price < 0) {
    discount = 0.5; // 50% discount for negative prices
  }

  return price - (price * discount);
}

// Usage example
console.log(calculateDiscount(120, true)); // Expected output with a discount applied