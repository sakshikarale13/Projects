# Assignment No: 5.2

## Title
Convert given infix expression Eg. a-b*c-d/e+f into postfix form using stack and show the operations step by step.

## Code

```cpp
#include <iostream>
#include <string>
#include <cctype>
#include <iomanip>
using namespace std;

typedef struct snode {
    char op;
    struct snode* next;
} SLL;

// Stack functions (linked-list implementation)

// push op onto stack; returns new head (top)
SLL* push(SLL* head, char op) {
    SLL* n = new SLL;
    n->op = op;
    n->next = head;
    return n;
}

// pop top if stack empty returns NULL and sets popped = '\0'
SLL* pop(SLL* head, char &popped) {
    if (!head) { popped = '\0'; return NULL; }
    SLL* tmp = head;
    popped = head->op;
    head = head->next;
    delete tmp;
    return head;
}

// peek top returns '\0' if empty
char peek(SLL* head) {
    if (!head) return '\0';
    return head->op;
}

// is empty
bool isEmpty(SLL* head) {
    return head == NULL;
}

// display stack contents from top to bottom as string (top first)
string stackToString(SLL* head) {
    if (!head) return "[]";
    string s = "[";
    SLL* cur = head;
    bool first = true;
    while (cur) {
        if (!first) s += ""; // optional separator
        s.push_back(cur->op);
        first = false;
        cur = cur->next;
    }
    s += "]";
    return s;
}

// Operator helpers
int precedence(char op) {
    if (op == '^') return 3;
    if (op == '*' || op == '/') return 2;
    if (op == '+' || op == '-') return 1;
    return 0;
}

// left-associative? ^ -> false (right-assoc), others true
bool isLeftAssociative(char op) {
    if (op == '^') return false;
    return true;
}

// is operator char
bool isOperator(char c) {
    return (c == '+' || c == '-' || c == '*' || c == '/' || c == '^');
}

// Infix to Postfix with detailed steps
void infixToPostfixWithSteps(const string &infix) {
    SLL* stack = NULL;
    string output;
    
    int i = 0;
    int n = (int)infix.size();
    
    cout << "Converting Infix: " << infix << "\n\n";
    cout << "Step-by-step operations:\n";
    cout << left << setw(10) << "Token" << setw(35) << "Action" << setw(25) << "Stack (top..bottom)" << "Output\n";
    cout << string(80, '-') << "\n";

    while (i < n) {
        // skip spaces
        if (isspace(infix[i])) { i++; continue; }

        // if operand (alnum), read full token and append to output
        if (isalnum(infix[i])) {
            string operand;
            while (i < n && isalnum(infix[i])) {
                operand.push_back(infix[i]);
                i++;
            }
            if (!output.empty()) output += "";
            output += operand;
            
            cout << left << setw(10) << operand << setw(35) << "Append operand to output" 
                 << setw(25) << stackToString(stack) << output << "\n";
            continue;
        }

        char token = infix[i];
        i++;

        // If token is '(', push it
        if (token == '(') {
            stack = push(stack, token);
            cout << left << setw(10) << "(" << setw(35) << "Push '('" 
                 << setw(25) << stackToString(stack) << output << "\n";
            continue;
        }

        // If token is ')', pop until '('
        if (token == ')') {
            char popped;
            // pop and append until '(' or stack empty
            while (!isEmpty(stack) && peek(stack) != '(') {
                stack = pop(stack, popped);
                if (!output.empty()) output += "";
                output.push_back(popped);
                
                string action = "Pop and output " + string(1, popped);
                cout << left << setw(10) << ")" << setw(35) << action
                     << setw(25) << stackToString(stack) << output << "\n";
            }
            
            if (!isEmpty(stack) && peek(stack) == '(') {
                // pop the '(' and discard
                stack = pop(stack, popped); // popped = '('
                cout << left << setw(10) << ")" << setw(35) << "Pop (and discard)"
                     << setw(25) << stackToString(stack) << output << "\n";
            } else {
                cout << "Error: mismatched parentheses\n";
            }
            continue;
        }

        // If token is operator
        if (isOperator(token)) {
            while (!isEmpty(stack) && isOperator(peek(stack))) {
                char topOp = peek(stack);
                int pTop = precedence(topOp);
                int pTok = precedence(token);
                
                if ((pTop > pTok) || (pTop == pTok && isLeftAssociative(token))) {
                    char popped;
                    stack = pop(stack, popped);
                    if (!output.empty()) output += "";
                    output.push_back(popped);
                    
                    string action = "Pop and output '" + string(1, popped) + "' (prec/assoc)";
                    cout << left << setw(10) << string(1, token) << setw(35) << action
                         << setw(25) << stackToString(stack) << output << "\n";
                } else {
                    break;
                }
            }
            stack = push(stack, token);
            cout << left << setw(10) << string(1, token) << setw(35) << "Push operator"
                 << setw(25) << stackToString(stack) << output << "\n";
            continue;
        }
        
        cout << "Skipping unrecognized token: " << token << "\n";
    }

    // End of input: pop remaining operators to output
    while (!isEmpty(stack)) {
        char popped;
        stack = pop(stack, popped);
        if (popped == '(' || popped == ')') {
             cout << "Error: mismatched parentheses in final cleanup\n";
             continue;
        }
        if (!output.empty()) output += "";
        output.push_back(popped);
        
        string action = "Pop and output " + string(1, popped) + " at end";
        cout << left << setw(10) << "EOF" << setw(35) << action
             << setw(25) << stackToString(stack) << output << "\n";
    }

    cout << "\nFinal Postfix: " << output << "\n";
}

int main() {
    cout << "Enter infix expression (operators + - * / ^ and parentheses allowed): \n";
    string infix;
    getline(cin, infix);
    
    if (infix.empty()) {
        infix = "a-b*c-d/e+f";
        cout << "No input provided. Example used: " << infix << "\n";
    }
    
    infixToPostfixWithSteps(infix);
    return 0;
}
```

## Output

```text
Enter infix expression: a+b*c/d

Converting Infix: a+b*c/d

Step-by-step operations:
Token     Action                             Stack (top..bottom)      Output
--------------------------------------------------------------------------------
a         Append operand to output           []                       a
+         Push operator                      [+]                      a
b         Append operand to output           [+]                      ab
* Push operator                      [*+]                     ab
c         Append operand to output           [*+]                     abc
/         Pop and output '*' (prec/assoc)    [+]                      abc*
/         Push operator                      [/+]                     abc*
d         Append operand to output           [/+]                     abc*d
EOF       Pop and output / at end            [+]                      abc*d/
EOF       Pop and output + at end            []                       abc*d/+

Final Postfix: abc*d/+
```
