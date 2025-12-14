# Assignment No: 11.2

## Title
Implement collision handling using separate chaining.

## Code

```cpp
#include <iostream>
using namespace std;

#define SIZE 10

// Node for Linked List
struct Node {
    int data;
    Node* next;
};

// Hash table array of pointers
Node* table[SIZE];

// Hash function
int hashFunction(int key) {
    return key % SIZE;
}

// Insert using Separate Chaining
void insert(int key) {
    int index = hashFunction(key);
    
    Node* newNode = new Node();
    newNode->data = key;
    newNode->next = NULL;

    // If no node exists
    if (table[index] == NULL) {
        table[index] = newNode;
    } else {
        // Add at beginning of linked list
        newNode->next = table[index];
        table[index] = newNode;
    }
}

// Display hash table
void display() {
    cout << "\nHash Table with Separate Chaining: \n";
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
45 14 23 78 90

Hash Table with Separate Chaining: 
0 -> 90 -> NULL
1 -> NULL
2 -> NULL
3 -> 23 -> NULL
4 -> 14 -> NULL
5 -> 45 -> NULL
6 -> NULL
7 -> NULL
8 -> 78 -> NULL
9 -> NULL
```
