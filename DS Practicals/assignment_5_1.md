# Assignment No: 5.1

## Title
WAP to build a simple stock price tracker that keeps a history of daily stock prices entered by the user. To allow users to go back and view or remove the most recent price, implement a stack using a linked list to store these integer prices.

Implement the following operations:
1. record(price) - Add a new stock price (an integer) to the stack.
2. remove()- Remove and return the most recent price (top of the stack).
3. latest()-Return the most recent stock price without removing it.
4. isEmpty()- Check if there are no prices recorded.

## Code

```cpp
#include <iostream>
using namespace std;

typedef struct node {
    int price;
    struct node* next;
} STACK;

// create new node
STACK* createNode(int x) {
    STACK* p = new STACK;
    p->price = x;
    p->next = NULL;
    return p;
}

// 1. record(price) -> push
STACK* recordPrice(STACK* top, int price) {
    STACK* node = createNode(price);
    node->next = top; // push on top
    return node; // new top
}

// 2. remove() -> pop and return removed price
STACK* removePrice(STACK* top, int &removedPrice) {
    if (!top) {
        cout << "Stack Empty. No price to remove.\n";
        removedPrice = -1;
        return NULL;
    }
    STACK* temp = top;
    removedPrice = temp->price;
    top = top->next;
    delete temp;
    return top; // new top
}

// 3. latest() -> peek top value
int latest(STACK* top) {
    if (!top) {
        cout << "No latest price. Stack empty.\n";
        return -1;
    }
    return top->price;
}

// 4. isEmpty()
bool isEmpty(STACK* top) {
    return (top == NULL);
}

// display stack (for testing)
void display(STACK* top) {
    if (!top) {
        cout << "(empty)\n";
        return;
    }
    STACK* cur = top;
    cout << "Prices (top to bottom): ";
    while (cur) {
        cout << cur->price << " ";
        cur = cur->next;
    }
    cout << "\n";
}

int main() {
    STACK* top = NULL;
    int choice, price, removed;

    do {
        cout << "\n-- MENU --\n";
        cout << "1. Record new price\n";
        cout << "2. Remove most recent price\n";
        cout << "3. Show latest price\n";
        cout << "4. Check if empty\n";
        cout << "5. Display all prices\n";
        cout << "6. Exit\n";
        cout << "Enter choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "Enter price: ";
                cin >> price;
                top = recordPrice(top, price);
                break;
            case 2:
                top = removePrice(top, removed);
                if (removed != -1)
                    cout << "Removed price: " << removed << "\n";
                break;
            case 3:
                price = latest(top);
                if (price != -1)
                    cout << "Latest price: " << price << "\n";
                break;
            case 4:
                if (isEmpty(top))
                    cout << "No prices recorded. Stack Empty.\n";
                else
                    cout << "Stack is NOT empty.\n";
                break;
            case 5:
                display(top);
                break;
            case 6:
                cout << "Exiting...\n";
                break;
            default:
                cout << "Invalid choice.\n";
        }
    } while (choice != 6);

    return 0;
}
```

## Output

```text
MENU
1. Record new price
2. Remove most recent price
3. Show latest price
4. Check if empty
5. Display all prices
6. Exit
Enter choice: 1
Enter price: 120

Enter choice: 3
Latest price: 120

Enter choice: 4
Stack is NOT empty.

Enter choice: 5
Prices (top to bottom): 120 

Enter choice: 1
Enter price: 150

Enter choice: 5
Prices (top to bottom): 150 120
```
