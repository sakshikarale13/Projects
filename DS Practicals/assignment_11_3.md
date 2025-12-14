# Assignment No: 11.3

## Title
Implement collision resolution using linked lists.

## Code

```cpp
#include <iostream>
using namespace std;

#define SIZE 10

// Linked List Node
struct Node {
    int data;
    Node* next;
};

// Hash table
Node* table[SIZE];

// Hash Function
int hashFunction(int key) {
    return key % SIZE;
}

// Insert element into hash table
void insert(int key) {
    int index = hashFunction(key);
    
    Node* newNode = new Node();
    newNode->data = key;
    newNode->next = table[index]; // Add at beginning
    table[index] = newNode;
}

// Display Hash Table
void display() {
    cout << "\nHash Table:\n";
    for(int i = 0; i < SIZE; i++) {
        cout << i << " -> ";
        Node* temp = table[i];
        while(temp != NULL) {
            cout << temp->data << " -> ";
            temp = temp->next;
        }
        cout << "NULL" << endl;
    }
}

int main() {
    int n, key;

    // Initialize table
    for(int i = 0; i < SIZE; i++) {
        table[i] = NULL;
    }

    cout << "Enter number of elements: ";
    cin >> n;

    cout << "Enter elements:\n";
    for(int i = 0; i < n; i++) {
        cin >> key;
        insert(key);
    }

    display();

    return 0;
}
```

## Output

```text
Enter number of elements: 5
Enter elements:
34 13 56 78 90

Hash Table:
0 -> 90 -> NULL
1 -> NULL
2 -> NULL
3 -> 13 -> NULL
4 -> 34 -> NULL
5 -> NULL
6 -> 56 -> NULL
7 -> NULL
8 -> 78 -> NULL
9 -> NULL
```
