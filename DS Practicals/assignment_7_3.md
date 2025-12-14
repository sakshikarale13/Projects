# Assignment No: 7.3

## Title
Write a Program to create a Binary Tree Search and Find Minimum/Maximum in BST.

## Code

```cpp
#include <iostream>
using namespace std;

typedef struct node {
    int key;
    struct node* left;
    struct node* right;
} BTNODE;

BTNODE* createNode(int k) {
    BTNODE* n = new BTNODE;
    n->key = k;
    n->left = n->right = NULL;
    return n;
}

BTNODE* insertNode(BTNODE* root, int key) {
    if (root == NULL)
        return createNode(key);
        
    if (key < root->key)
        root->left = insertNode(root->left, key);
    else if (key > root->key)
        root->right = insertNode(root->right, key);
    else
        cout << "Duplicate key ignored.\n";
        
    return root;
}

BTNODE* findMin(BTNODE* root) {
    if (!root) return NULL;
    while (root->left)
        root = root->left;
    return root;
}

BTNODE* findMax(BTNODE* root) {
    if (!root) return NULL;
    while (root->right)
        root = root->right;
    return root;
}

void inorder(BTNODE* root) {
    if (!root) return;
    inorder(root->left);
    cout << root->key << " ";
    inorder(root->right);
}

void freeTree(BTNODE* root) {
    if (!root) return;
    freeTree(root->left);
    freeTree(root->right);
    delete root;
}

int main() {
    BTNODE* root = NULL;
    int choice, key;
    cout << "=== BST: Insert, Find Min & Max ===\n";
    do {
        cout << "\nMENU\n";
        cout << "1. Insert Key\n";
        cout << "2. Display Inorder\n";
        cout << "3. Find Minimum\n";
        cout << "4. Find Maximum\n";
        cout << "5. Exit\n";
        cout << "Enter choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "Enter value to insert: ";
                cin >> key;
                root = insertNode(root, key);
                break;
            case 2:
                cout << "Inorder Traversal: ";
                inorder(root);
                cout << "\n";
                break;
            case 3: {
                BTNODE* mn = findMin(root);
                if (mn) cout << "Minimum value = " << mn->key << "\n";
                else cout << "Tree is empty.\n";
                break;
            }
            case 4: {
                BTNODE* mx = findMax(root);
                if (mx) cout << "Maximum value = " << mx->key << "\n";
                else cout << "Tree is empty.\n";
                break;
            }
            case 5:
                cout << "Exiting...\n";
                freeTree(root);
                break;
            default:
                cout << "Invalid choice.\n";
        }
    } while (choice != 5);
    
    return 0;
}
```

## Output

```text
=== BST: Insert, Find Min & Max ===
MENU
1. Insert Key
2. Display Inorder
3. Find Minimum
4. Find Maximum
5. Exit
Enter choice: 1
Enter value to insert: 10

Enter choice: 1
Enter value to insert: 20

Enter choice: 1
Enter value to insert: 30

Enter choice: 2
Inorder Traversal: 10 20 30 

Enter choice: 3
Minimum value = 10

Enter choice: 4
Maximum value = 30
```
