#include <iostream>
#include <memory>
#include <string>

using namespace std;

// Abstract Product A
class Order {
public:
    virtual void showInfo() = 0;
    virtual ~Order() = default;
};

// Concrete Product A1
class OnlineOrder : public Order {
public:
    void showInfo() override {
        cout << "Online Order created." << endl;
    }
};

// Concrete Product A2
class InStoreOrder : public Order {
public:
    void showInfo() override {
        cout << "In-Store Order created." << endl;
    }
};

// Abstract Product B
class OrderProcessor {
public:
    virtual void process(Order* order) = 0;
    virtual ~OrderProcessor() = default;
};

// Concrete Product B1
class OnlineOrderProcessor : public OrderProcessor {
public:
    void process(Order* order) override {
        cout << "Processing Online Order." << endl;
        order->showInfo();
    }
};

// Concrete Product B2
class InStoreOrderProcessor : public OrderProcessor {
public:
    void process(Order* order) override {
        cout << "Processing In-Store Order." << endl;
        order->showInfo();
    }
};

// Abstract Factory
class OrderFactory {
public:
    virtual Order* createOrder() = 0;
    virtual OrderProcessor* createProcessor() = 0;
    virtual ~OrderFactory() = default;
};

// Concrete Factory 1
class OnlineOrderFactory : public OrderFactory {
public:
    Order* createOrder() override {
        return new OnlineOrder();
    }

    OrderProcessor* createProcessor() override {
        return new OnlineOrderProcessor();
    }
};

// Concrete Factory 2
class InStoreOrderFactory : public OrderFactory {
public:
    Order* createOrder() override {
        return new InStoreOrder();
    }

    OrderProcessor* createProcessor() override {
        return new InStoreOrderProcessor();
    }
};

// Client code
void clientCode(OrderFactory* factory) {
    Order* order = factory->createOrder();
    OrderProcessor* processor = factory->createProcessor();

    processor->process(order);

    delete order;
    delete processor;
}

int main() {
    cout << "Using OnlineOrderFactory:\n";
    clientCode(new OnlineOrderFactory());

    cout << "\nUsing InStoreOrderFactory:\n";
    clientCode(new InStoreOrderFactory());

    return 0;
}
