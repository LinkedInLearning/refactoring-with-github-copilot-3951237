function processOrder(order) {
    // Validate order
    if (!order) {
        console.log("Invalid order.");
        return;
    }
    if (!order.customer) {
        console.log("Missing customer information.");
        return;
    }
    if (!order.items || order.items.length === 0) {
        console.log("No items in the order.");
        return;
    }

    // Calculate total price
    let totalPrice = 0;
    for (let i = 0; i < order.items.length; i++) {
        let item = order.items[i];
        let itemPrice = item.price * item.quantity;
        if (item.discount) {
            itemPrice -= (itemPrice * item.discount) / 100;
        }
        totalPrice += itemPrice;
    }

    // Apply shipping
    let shippingCost = 0;
    if (totalPrice > 100) {
        shippingCost = 0;
    } else {
        shippingCost = 10;
    }
    totalPrice += shippingCost;

    // Send notification
    console.log(`Order processed for ${order.customer.name}`);
    console.log(`Total price: $${totalPrice}`);
    console.log(`Shipping cost: $${shippingCost}`);
}