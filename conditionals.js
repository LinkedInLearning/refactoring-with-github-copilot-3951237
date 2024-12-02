function calculateDiscount(customerType, purchaseAmount, isHoliday) {
  let discount = 0;

  if (customerType === "regular") {
    if (purchaseAmount > 100) {
      if (isHoliday) {
        discount = 0.15; // 15% for regular customers during holidays
      } else {
        discount = 0.1; // 10% for regular customers
      }
    } else {
      if (isHoliday) {
        discount = 0.05; // 5% for small purchases during holidays
      }
    }
  } else if (customerType === "premium") {
    if (purchaseAmount > 100) {
      discount = isHoliday ? 0.2 : 0.15; // 20% during holidays, 15% otherwise
    } else {
      discount = isHoliday ? 0.1 : 0.05; // Smaller discounts for small purchases
    }
  } else if (customerType === "vip") {
    discount = isHoliday ? 0.3 : 0.25; // Flat discount for VIP customers
  }

  return purchaseAmount * (1 - discount);
}

if ( user.isLoggedIn && user.isAdmin ) {
  // Admin-only functionality
}