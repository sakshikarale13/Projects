# Assignment No: 10.4

## Title
Write a Program to implement Kruskal's algorithm to find the minimum spanning tree of a user defined graph. Use Adjacency List to represent a graph.

## Code

```cpp
#include <iostream>
using namespace std;

// Structure for edge linked list
struct Edge {
    int u, v, w;
    Edge* next;
};

// Add edge to linked list
void addEdge(Edge* &head, int u, int v, int w) {
    Edge* newEdge = new Edge();
    newEdge->u = u;
    newEdge->v = v;
    newEdge->w = w;
    newEdge->next = head;
    head = newEdge;
}

// Find parent (Disjoint Set)
int find(int parent[], int i) {
    if(parent[i] == i) {
        return i;
    }
    return find(parent, parent[i]);
}

// Union of two sets
void unite(int parent[], int x, int y) {
    int a = find(parent, x);
    int b = find(parent, y);
    parent[a] = b;
}

// Sort edges by weight (Bubble Sort on linked list)
void sortEdges(Edge* &head) {
    Edge *i, *j;
    for(i = head; i != NULL; i = i->next) {
        for(j = i->next; j != NULL; j = j->next) {
            if(i->w > j->w) {
                swap(i->u, j->u);
                swap(i->v, j->v);
                swap(i->w, j->w);
            }
        }
    }
}

// Kruskal Algorithm
void kruskal(Edge* head, int n) {
    int parent[10];
    for(int i = 0; i < n; i++) {
        parent[i] = i;
    }

    sortEdges(head);

    cout << "\nEdges in Minimum Spanning Tree: \n";
    int total = 0;
    Edge* temp = head;

    while(temp != NULL) {
        int u = temp->u;
        int v = temp->v;

        if (find(parent, u) != find(parent, v)) {
            cout << u << " - " << v << " : " << temp->w << endl;
            total += temp->w;
            unite(parent, u, v);
        }
        temp = temp->next;
    }
    cout << "Total Cost = " << total << endl;
}

int main() {
    int n, e, u, v, w;
    Edge* head = NULL;

    cout << "Enter number of vertices: ";
    cin >> n;

    cout << "Enter number of edges: ";
    cin >> e;

    cout << "Enter edges (u v weight):\n";
    for(int i = 0; i < e; i++) {
        cin >> u >> v >> w;
        addEdge(head, u, v, w);
    }

    kruskal(head, n);

    return 0;
}
```

## Output

```text
Enter number of vertices: 4
Enter number of edges: 5
Enter edges (u v weight):
0 1 10
0 2 6
0 3 5
1 3 15
2 3 4

Edges in Minimum Spanning Tree: 
2 - 3 : 4
0 - 3 : 5
0 - 1 : 10
Total Cost = 19
```
