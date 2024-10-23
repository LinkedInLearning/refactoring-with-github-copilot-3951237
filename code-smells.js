const FREE_SHIPPING_THRESHOLD = 100;
const SHIPPING_COST = 10;

function validateOrder(order) {
  if (!order) {
    return "Invalid order.";
  }
  if (!order.customer) {
    return "Missing customer information.";
  }
  if (!order.items || order.items.length === 0) {
    return "No items in the order.";
  }
  return null;
}

function calculateTotalPrice(items) {
  return items.reduce((total, item) => total + item.price * item.quantity, 0);
}

function applyShipping(totalPrice) {
  return totalPrice > FREE_SHIPPING_THRESHOLD ? 0 : SHIPPING_COST;
}

function processOrder(order) {
  const errorMessage = validateOrder(order);
  if (errorMessage) {
    console.log(errorMessage);
    return;
  }

  let totalPrice = calculateTotalPrice(order.items);
  const shippingCost = applyShipping(totalPrice);
  totalPrice += shippingCost;

  console.log(`Order processed for ${order.customer.name}`);
  console.log(`Total price: $${totalPrice.toFixed(2)}`);
  console.log(`Shipping cost: $${shippingCost}`);
}