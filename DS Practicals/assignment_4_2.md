# Assignment No: 4.2

## Title
WAP to perform addition of two polynomials using singly linked list.

## Code

```cpp
#include<iostream>
#include<cmath>
using namespace std;

struct Node {
    int coef, exp;
    Node* next;
    
    Node(int c, int e, Node* n = NULL) {
        coef = c;
        exp = e;
        next = n;
    }
};

Node* insert(Node* h, int c, int e) {
    if (h == NULL) return new Node(c, e, NULL);
    
    Node* t = new Node(c, e, NULL);
    
    // Insert at beginning if exp is smaller (assuming sorted by exp ascending)
    // OR inserting based on the logic provided in PDF (descending order typically)
    if (h->exp < e) {
        t->next = h;
        return t;
    }
    
    Node* p = h;
    while (p->next && p->next->exp > e) {
        p = p->next;
    }
    
    if (p->exp == e) {
        p->coef += c;
        delete t;
        return h;
    }
    
    t->next = p->next;
    p->next = t;
    return h;
}

void display(Node* h) {
    if (!h) {
        cout << "0";
        return;
    }
    
    bool first = true;
    while (h) {
        if (h->coef != 0) {
            if (!first && h->coef > 0) cout << "+";
            
            int absCoef = abs(h->coef);
            if (!first && h->coef < 0) cout << "-";
            else if (first && h->coef < 0) cout << "-";
            
            if (h->exp == 0) {
                cout << absCoef;
            } else if (h->exp == 1) {
                if (absCoef != 1) cout << absCoef << "x";
                else cout << "x";
            } else {
                if (absCoef != 1) cout << absCoef << "x^" << h->exp;
                else cout << "x^" << h->exp;
            }
            first = false;
        }
        h = h->next;
    }
}

Node* add(Node* a, Node* b) {
    Node* r = NULL;
    
    while (a && b) {
        if (a->exp == b->exp) {
            int sumCoef = a->coef + b->coef;
            if (sumCoef != 0) {
                r = insert(r, sumCoef, a->exp);
            }
            a = a->next;
            b = b->next;
        } else if (a->exp > b->exp) {
            r = insert(r, a->coef, a->exp);
            a = a->next;
        } else {
            r = insert(r, b->coef, b->exp);
            b = b->next;
        }
    }
    
    while (a) {
        r = insert(r, a->coef, a->exp);
        a = a->next;
    }
    while (b) {
        r = insert(r, b->coef, b->exp);
        b = b->next;
    }
    return r;
}

void destroy(Node* h) {
    while (h) {
        Node* temp = h;
        h = h->next;
        delete temp;
    }
}

int main() {
    Node *p1 = NULL, *p2 = NULL, *sum = NULL;
    int ch, c, e;
    
    cout << " POLYNOMIAL ADDITION USING SLL (C++) \n";
    
    do {
        cout << "\n[1] Insert in P1\n[2] Insert in P2\n[3] Add Polynomials\n";
        cout << "[4] Display All\n[5] Exit\nChoice: ";
        cin >> ch;
        
        switch(ch) {
            case 1:
                cout << "Coeff Exp: ";
                cin >> c >> e;
                p1 = insert(p1, c, e);
                break;
            case 2:
                cout << "Coeff Exp: ";
                cin >> c >> e;
                p2 = insert(p2, c, e);
                break;
            case 3:
                if (sum) destroy(sum);
                sum = add(p1, p2);
                cout << "Polynomials added successfully \n";
                break;
            case 4:
                cout << "\nP1 : "; display(p1);
                cout << "\nP2 : "; display(p2);
                cout << "\nSum: "; display(sum);
                cout << "\n";
                break;
            case 5:
                destroy(p1); destroy(p2); destroy(sum);
                cout << "\nExiting...\n";
                break;
            default:
                cout << "\nInvalid choice!\n";
        }
    } while(ch != 5);
    
    return 0;
}
```

## Output

```text
POLYNOMIAL ADDITION USING SLL (C++)
...
Choice: 1
Coeff Exp: 3 2
Choice: 1
Coeff Exp: 5 1
Choice: 1
Coeff Exp: 2 0

Choice: 2
Coeff Exp: 4 2
Choice: 2
Coeff Exp: -2 1
Choice: 2
Coeff Exp: 7 0

Choice: 3
Polynomials added successfully!

Choice: 4
P1 : 3x^2+5x+2
P2 : 4x^2-2x+7
Sum: 7x^2+3x+9
```
