#include <iostream>
#include <string>
using namespace std;

// Forward declaration
class OrderComponent;

// Mediator interface
class OrderMediator {
public:
    virtual void notify(OrderComponent* sender, const string& event) = 0;
};

// Abstract component
class OrderComponent {
protected:
    OrderMediator* mediator;
public:
    void setMediator(OrderMediator* m) { mediator = m; }
    virtual void notify(const string& message) = 0;
};

// Concrete components
class Order : public OrderComponent {
    string name;
public:
    Order(const string& n) : name(n) {}
    string getName() const { return name; }

    void notify(const string& message) override {
        cout << "[Order] " << name << " received message: " << message << endl;
    }

    void submitOrder();
};

class Inventory : public OrderComponent {
public:
    void notify(const string& message) override {
        cout << "[Inventory] received message: " << message << endl;
    }

    void reserveItem() {
        cout << "[Inventory] Reserving item..." << endl;
        mediator->notify(this, "item_reserved");
    }
};

class Shipping : public OrderComponent {
public:
    void notify(const string& message) override {
        cout << "[Shipping] received message: " << message << endl;
    }

    void shipOrder() {
        cout << "[Shipping] Shipping order..." << endl;
    }
};

// Concrete Mediator
class ConcreteOrderMediator : public OrderMediator {
private:
    Order* order;
    Inventory* inventory;
    Shipping* shipping;
public:
    void setOrder(Order* o) { order = o; }
    void setInventory(Inventory* i) { inventory = i; }
    void setShipping(Shipping* s) { shipping = s; }

    void notify(OrderComponent* sender, const string& event) override {
        if (event == "order_submitted") {
            cout << "[Mediator] Order submitted. Informing inventory..." << endl;
            inventory->reserveItem();
        } else if (event == "item_reserved") {
            cout << "[Mediator] Item reserved. Informing shipping..." << endl;
            shipping->shipOrder();
        }
    }
};

void Order::submitOrder() {
    cout << "[Order] Submitting order..." << endl;
    mediator->notify(this, "order_submitted");
}

// Main
int main() {
    ConcreteOrderMediator mediator;

    Order order("Order #001");
    Inventory inventory;
    Shipping shipping;

    order.setMediator(&mediator);
    inventory.setMediator(&mediator);
    shipping.setMediator(&mediator);

    mediator.setOrder(&order);
    mediator.setInventory(&inventory);
    mediator.setShipping(&shipping);

    order.submitOrder();

    return 0;
}
