# Assignment No: 4.1

## Title
Write a C++ program to implement a Set using a Generalized Linked List (GLL). For example:
Let S = { p, q, {r, s, t, {}, {u, v}, w, x, y, z , al, b1} }
Store this structure using a Generalized Linked List and display the elements in correct set notation format.

## Code

```cpp
#include <iostream>
#include <string>
using namespace std;

struct GLL {
    int flag; // 0 for atom, 1 for sublist
    string data;
    GLL* next;
    GLL* down;
    
    GLL() : flag(0), data(""), next(NULL), down(NULL) {}
};

GLL* create(); // Forward declaration

GLL* createAtom() {
    GLL* node = new GLL();
    node->flag = 0;
    cout << "Enter atom: ";
    cin >> node->data;
    node->down = NULL;
    return node;
}

GLL* createSublist() {
    GLL* node = new GLL();
    node->flag = 1;
    node->data = "";
    cout << "-> Creating sublist:\n";
    return node;
}

GLL* create() {
    int choice;
    cout << "\n[0] Atom [1] Sublist [2] Stop\nChoice: ";
    cin >> choice;
    
    if (choice == 2) return NULL;
    
    GLL* node = NULL;
    
    if (choice == 0) {
        node = createAtom();
    } else if (choice == 1) {
        node = createSublist();
        node->down = create();
        cout << "< Back to parent level\n";
    } else {
        cout << "Invalid! Try again.\n";
        return create();
    }
    
    node->next = create();
    return node;
}

void display(GLL* head) {
    cout << "{";
    while (head) {
        if (head->flag == 0)
            cout << head->data;
        else
            display(head->down);
            
        if (head->next) cout << ", ";
        head = head->next;
    }
    cout << "}";
}

void destroy(GLL* head) {
    while (head) {
        GLL* temp = head;
        if (head->flag == 1)
            destroy(head->down);
        head = head->next;
        delete temp;
    }
}

int main() {
    int choice;
    GLL* head = NULL;
    
    cout << "SET IMPLEMENTATION USING GLL (C++) \n";
    
    do {
        cout << "\n[1] Create Set\n[2] Display Set\n[3] Exit\nChoice: ";
        cin >> choice;
        
        switch(choice) {
            case 1:
                if (head != NULL) destroy(head);
                cout << "\nStart building your set...\n";
                head = create();
                cout << "\nSet created successfully!\n";
                break;
                
            case 2:
                if (head == NULL) {
                    cout << "\nSet is empty! Create a set first.\n";
                } else {
                    cout << "\nSet = ";
                    display(head);
                    cout << "\n";
                }
                break;
                
            case 3:
                if (head != NULL) destroy(head);
                cout << "\nExiting...\n";
                break;
                
            default:
                cout << "\nInvalid choice! Try again.\n";
        }
    } while(choice != 3);
    
    return 0;
}
```

## Output

```text
SET IMPLEMENTATION USING GLL (C++)

[1] Create Set
[2] Display Set
[3] Exit
Choice: 1

Start building your set...
[0] Atom [1] Sublist [2] Stop
Choice: 0
Enter atom: 10
[0] Atom [1] Sublist [2] Stop
Choice: 1
-> Creating sublist:
[0] Atom [1] Sublist [2] Stop
Choice: 0
Enter atom: 20
[0] Atom [1] Sublist [2] Stop
Choice: 2
< Back to parent level
[0] Atom [1] Sublist [2] Stop
Choice: 0
Enter atom: 30
[0] Atom [1] Sublist [2] Stop
Choice: 2

Set created successfully!

[1] Create Set
[2] Display Set
[3] Exit
Choice: 2

Set = {10, {20}, 30}
```
