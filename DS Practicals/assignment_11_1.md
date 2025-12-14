# Assignment No: 11.1

## Title
Implement a hash table with collision resolution using linear probing.

## Code

```cpp
#include <iostream>
using namespace std;

#define SIZE 10

// Linked List Node
struct Node {
    int data;
};

// Hash Table using array of node pointers
Node* table[SIZE];

// Hash function
int hashFunction(int key) {
    return key % SIZE;
}

// Insert using Linear Probing
void insert(int key) {
    int index = hashFunction(key);
    int originalIndex = index;

    // Linear probing
    while(table[index] != NULL) {
        index = (index + 1) % SIZE;
        // Check if table is full (looped back to start)
        if (index == originalIndex) {
            cout << "Hash Table is Full! Cannot insert " << key << endl;
            return;
        }
    }

    table[index] = new Node();
    table[index]->data = key;
}

// Display hash table
void display() {
    cout << "\nHash Table: \n";
    for(int i = 0; i < SIZE; i++) {
        if(table[i] != NULL) {
            cout << i << " --> " << table[i]->data << endl;
        } else {
            cout << i << " --> NULL" << endl;
        }
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
34 56 13 34 67

Hash Table: 
0 --> NULL
1 --> NULL
2 --> NULL
3 --> 13
4 --> 34
5 --> 34
6 --> 56
7 --> 67
8 --> NULL
9 --> NULL
```
