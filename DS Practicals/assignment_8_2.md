# Assignment No: 8.2

## Title
Write a program to illustrate operations on a BST with numeric keys: Insert, Delete, Find, Show.

## Code

```cpp
#include <iostream>
using namespace std;

typedef struct node {
    int key;
    struct node* left;
    struct node* right;
} BST;

BST* createNode(int k) {
    BST* p = new BST;
    p->key = k;
    p->left = p->right = NULL;
    return p;
}

BST* insertNode(BST* root, int k) {
    if (root == NULL) return createNode(k);
    
    if (k < root->key)
        root->left = insertNode(root->left, k);
    else if (k > root->key)
        root->right = insertNode(root->right, k);
    else
        cout << "Key " << k << " already exists. Ignored.\n";
        
    return root;
}

bool searchNode(BST* root, int k) {
    if (!root) return false;
    if (k == root->key) return true;
    if (k < root->key) return searchNode(root->left, k);
    return searchNode(root->right, k);
}

BST* findMin(BST* root) {
    while (root && root->left)
        root = root->left;
    return root;
}

BST* deleteNode(BST* root, int k) {
    if (!root) {
        cout << "Key not found.\n";
        return NULL;
    }
    
    if (k < root->key)
        root->left = deleteNode(root->left, k);
    else if (k > root->key)
        root->right = deleteNode(root->right, k);
    else {
        // Node found
        if (!root->left && !root->right) {
            delete root;
            return NULL;
        }
        else if (!root->left) {
            BST* temp = root->right;
            delete root;
            return temp;
        }
        else if (!root->right) {
            BST* temp = root->left;
            delete root;
            return temp;
        }
        else {
            BST* succ = findMin(root->right);
            root->key = succ->key;
            root->right = deleteNode(root->right, succ->key);
        }
    }
    return root;
}

void inorder(BST* root) {
    if (!root) return;
    inorder(root->left);
    cout << root->key << " ";
    inorder(root->right);
}

void freeTree(BST* root) {
    if (!root) return;
    freeTree(root->left);
    freeTree(root->right);
    delete root;
}

int main() {
    BST* root = NULL;
    int choice, key;
    cout << "=== BST Operations: Insert | Delete | Find | Show ===\n";
    do {
        cout << "\nMenu:\n";
        cout << "1. Insert key\n";
        cout << "2. Delete key\n";
        cout << "3. Find key\n";
        cout << "4. Show (Inorder Traversal)\n";
        cout << "5. Exit\n";
        cout << "Enter choice: ";
        cin >> choice;

        switch (choice) {
            case 1:
                cout << "Enter key to insert: ";
                cin >> key;
                root = insertNode(root, key);
                break;
            case 2:
                cout << "Enter key to delete: ";
                cin >> key;
                root = deleteNode(root, key);
                break;
            case 3:
                cout << "Enter key to search: ";
                cin >> key;
                if (searchNode(root, key))
                    cout << "Key FOUND in BST.\n";
                else
                    cout << "Key NOT FOUND.\n";
                break;
            case 4:
                cout << "BST (Inorder): ";
                inorder(root);
                cout << "\n";
                break;
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
=== BST Operations: Insert | Delete | Find | Show ===

Menu:
1. Insert key
2. Delete key
3. Find key
4. Show (Inorder Traversal)
5. Exit
Enter choice: 1
Enter key to insert: 10

Enter choice: 1
Enter key to insert: 20

Enter choice: 1
Enter key to insert: 30

Enter choice: 4
BST (Inorder): 10 20 30 

Enter choice: 3
Enter key to search: 20
Key FOUND in BST.

Enter choice: 2
Enter key to delete: 10
```
