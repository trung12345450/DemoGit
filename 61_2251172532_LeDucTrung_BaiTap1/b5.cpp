#include <iostream>
#include <string>
using namespace std;

// Product: Order
class Order {
private:
    string customerName;
    string address;
    string item;
    int quantity;
    string deliveryMethod;

public:
    void setCustomerName(const string& name) { customerName = name; }
    void setAddress(const string& addr) { address = addr; }
    void setItem(const string& i) { item = i; }
    void setQuantity(int q) { quantity = q; }
    void setDeliveryMethod(const string& method) { deliveryMethod = method; }

    void print() const {
        cout << "Customer: " << customerName << endl;
        cout << "Address: " << address << endl;
        cout << "Item: " << item << endl;
        cout << "Quantity: " << quantity << endl;
        cout << "Delivery: " << deliveryMethod << endl;
    }
};

// Abstract Builder
class OrderBuilder {
public:
    virtual void buildCustomerName() = 0;
    virtual void buildAddress() = 0;
    virtual void buildItem() = 0;
    virtual void buildQuantity() = 0;
    virtual void buildDeliveryMethod() = 0;
    virtual Order* getOrder() = 0;
    virtual ~OrderBuilder() {}
};

// Concrete Builder
class OnlineOrderBuilder : public OrderBuilder {
private:
    Order* order;

public:
    OnlineOrderBuilder() { order = new Order(); }

    void buildCustomerName() override {
        order->setCustomerName("Le Duc Trung");
    }

    void buildAddress() override {
        order->setAddress("Hanoi, Vietnam");
    }

    void buildItem() override {
        order->setItem("Laptop");
    }

    void buildQuantity() override {
        order->setQuantity(1);
    }

    void buildDeliveryMethod() override {
        order->setDeliveryMethod("Online Delivery");
    }

    Order* getOrder() override {
        return order;
    }
};

// Director
class OrderDirector {
private:
    OrderBuilder* builder;

public:
    void setBuilder(OrderBuilder* b) {
        builder = b;
    }

    Order* construct() {
        builder->buildCustomerName();
        builder->buildAddress();
        builder->buildItem();
        builder->buildQuantity();
        builder->buildDeliveryMethod();
        return builder->getOrder();
    }
};

// Main
int main() {
    OnlineOrderBuilder builder;
    OrderDirector director;

    director.setBuilder(&builder);
    Order* order = director.construct();

    cout << "=== Order Info ===" << endl;
    order->print();

    delete order;
    return 0;
}
