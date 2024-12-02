function calculateDiscount(customerType, purchaseAmount, isHoliday) {
  const discountRates = {
    regular: {
      high: isHoliday ? 0.15 : 0.1,
      low: isHoliday ? 0.05 : 0
    },
    premium: {
      high: isHoliday ? 0.2 : 0.15,
      low: isHoliday ? 0.1 : 0.05
    },
    vip: {
      high: isHoliday ? 0.3 : 0.25,
      low: isHoliday ? 0.3 : 0.25
    }
  };

  const rate = purchaseAmount > 100 ? 'high' : 'low';
  const discount = discountRates[customerType][rate] || 0;

  return purchaseAmount * (1 - discount);
}