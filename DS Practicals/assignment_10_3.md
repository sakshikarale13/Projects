# Assignment No: 10.3

## Title
Write a Program to implement Prim's algorithm to find minimum spanning tree of a user defined graph. Use Adjacency List to represent a graph.

## Code

```cpp
#include <iostream>
#include <climits>
using namespace std;

// Node for adjacency list
struct Node {
    int vertex;
    int weight;
    Node* next;
};

// Function to create a new node
Node* createNode(int v, int w) {
    Node* newNode = new Node();
    newNode->vertex = v;
    newNode->weight = w;
    newNode->next = NULL;
    return newNode;
}

// Add edge to adjacency list
void addEdge(Node* adj[], int u, int v, int w) {
    Node* newNode = createNode(v, w);
    newNode->next = adj[u];
    adj[u] = newNode;

    // Since graph is undirected
    newNode = createNode(u, w);
    newNode->next = adj[v];
    adj[v] = newNode;
}

// Prim's Algorithm
void prim(int n, Node* adj[]) {
    int key[10], parent[10], visited[10];

    for(int i = 0; i < n; i++) {
        key[i] = INT_MAX;
        visited[i] = 0;
        parent[i] = -1;
    }

    key[0] = 0; // Start from vertex 0

    for(int count = 0; count < n - 1; count++) {
        int min = INT_MAX, u;

        // Find minimum key vertex
        for(int i = 0; i < n; i++) {
            if(!visited[i] && key[i] < min) {
                min = key[i];
                u = i;
            }
        }

        visited[u] = 1;

        Node* temp = adj[u];
        while(temp != NULL) {
            int v = temp->vertex;
            int w = temp->weight;

            if(!visited[v] && w < key[v]) {
                key[v] = w;
                parent[v] = u;
            }
            temp = temp->next;
        }
    }

    cout << "\nEdges in Minimum Spanning Tree: \n";
    int total = 0;
    for(int i = 1; i < n; i++) {
        cout << parent[i] << " - " << i << " : " << key[i] << endl;
        total += key[i];
    }
    cout << "Total Cost = " << total << endl;
}

int main() {
    int n, e, u, v, w;
    Node* adj[10];

    cout << "Enter number of vertices: ";
    cin >> n;

    for(int i = 0; i < n; i++) {
        adj[i] = NULL;
    }

    cout << "Enter number of edges: ";
    cin >> e;

    cout << "Enter edges (u v weight): \n";
    for(int i = 0; i < e; i++) {
        cin >> u >> v >> w;
        addEdge(adj, u, v, w);
    }

    prim(n, adj);

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
0 - 1 : 10
3 - 2 : 4
0 - 3 : 5
Total Cost = 19
```
