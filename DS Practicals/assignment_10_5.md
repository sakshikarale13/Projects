# Assignment No: 10.5

## Title
Write a Program to implement Dijkstra's algorithm to find shortest distance between two nodes of a user defined graph. Use Adjacency List to represent a graph.

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

// Create new node
Node* createNode(int v, int w) {
    Node* newNode = new Node();
    newNode->vertex = v;
    newNode->weight = w;
    newNode->next = NULL;
    return newNode;
}

// Add edge (undirected)
void addEdge(Node* adj[], int u, int v, int w) {
    Node* newNode = createNode(v, w);
    newNode->next = adj[u];
    adj[u] = newNode;

    newNode = createNode(u, w);
    newNode->next = adj[v];
    adj[v] = newNode;
}

// Dijkstra Algorithm
void dijkstra(Node* adj[], int n, int src) {
    int dist[10], visited[10];

    for(int i = 0; i < n; i++) {
        dist[i] = INT_MAX;
        visited[i] = 0;
    }

    dist[src] = 0;

    for(int count = 0; count < n - 1; count++) {
        int min = INT_MAX, u;

        // Find minimum distance vertex
        for(int i = 0; i < n; i++) {
            if(!visited[i] && dist[i] < min) {
                min = dist[i];
                u = i;
            }
        }

        visited[u] = 1;

        Node* temp = adj[u];
        while(temp != NULL) {
            int v = temp->vertex;
            int w = temp->weight;

            if(!visited[v] && dist[u] != INT_MAX && dist[u] + w < dist[v]) {
                dist[v] = dist[u] + w;
            }
            temp = temp->next;
        }
    }

    cout << "\nShortest distances from source " << src << ":\n";
    for(int i = 0; i < n; i++) {
        if (dist[i] == INT_MAX)
            cout << "To " << i << " = INF" << endl;
        else
            cout << "To " << i << " = " << dist[i] << endl;
    }
}

int main() {
    Node* adj[10];
    int n, e, u, v, w, src;

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

    cout << "Enter source vertex: ";
    cin >> src;

    dijkstra(adj, n, src);

    return 0;
}
```

## Output

```text
Enter number of vertices: 5
Enter number of edges: 6
Enter edges (u v weight): 
0 1 4
0 2 2
1 2 5
1 3 10
2 4 3
3 4 7
Enter source vertex: 0

Shortest distances from source 0:
To 0 = 0
To 1 = 4
To 2 = 2
To 3 = 12
To 4 = 5
```
