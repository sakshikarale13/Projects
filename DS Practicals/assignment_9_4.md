# Assignment No: 9.4

## Title
Write a Program to implement Dijkstra's algorithm to find shortest distance between two nodes of a user defined graph. Use Adjacency List to represent a graph.

## Code

```cpp
#include <iostream>
using namespace std;

#define INF 9999

struct Node {
    int vertex;
    int weight;
    Node* next;
};

class Graph {
    int V;
    Node* adjList[20];

public:
    Graph(int v) {
        V = v;
        for (int i = 0; i < V; i++) {
            adjList[i] = NULL;
        }
    }

    void addEdge(int src, int dest, int weight) {
        Node* newNode = new Node();
        newNode->vertex = dest;
        newNode->weight = weight;
        newNode->next = adjList[src];
        adjList[src] = newNode;

        newNode = new Node();
        newNode->vertex = src;
        newNode->weight = weight;
        newNode->next = adjList[dest];
        adjList[dest] = newNode;
    }

    void dijkstra(int start, int end) {
        int dist[20];
        bool visited[20];

        for (int i = 0; i < V; i++) {
            dist[i] = INF;
            visited[i] = false;
        }

        dist[start] = 0;

        for (int count = 0; count < V - 1; count++) {
            // Find vertex with min distance not yet processed
            int min = INF, u;

            for (int i = 0; i < V; i++) {
                if (!visited[i] && dist[i] < min) {
                    min = dist[i];
                    u = i;
                }
            }

            // Mark the picked vertex as processed
            visited[u] = true;

            // Update dist value of the adjacent vertices of the picked vertex
            Node* temp = adjList[u];
            while (temp != NULL) {
                int v = temp->vertex;
                int w = temp->weight;

                if (!visited[v] && dist[u] + w < dist[v]) {
                    dist[v] = dist[u] + w;
                }
                temp = temp->next;
            }
        }

        cout << "\nShortest distance from " << start << " to " << end << " = " << dist[end] << endl;
    }
};

int main() {
    int v, e, src, dest, weight, start, end;

    cout << "Enter number of vertices: ";
    cin >> v;

    Graph g(v);

    cout << "Enter number of edges: ";
    cin >> e;

    for (int i = 0; i < e; i++) {
        cout << "Enter edge (source destination weight): ";
        cin >> src >> dest >> weight;
        g.addEdge(src, dest, weight);
    }

    cout << "Enter starting node: ";
    cin >> start;
    cout << "Enter destination node: ";
    cin >> end;

    g.dijkstra(start, end);

    return 0;
}
```

## Output

```text
Enter number of vertices: 5
Enter number of edges: 6
Enter edge (source destination weight): 0 1 4
Enter edge (source destination weight): 0 2 1
Enter edge (source destination weight): 2 1 2
Enter edge (source destination weight): 1 3 1
Enter edge (source destination weight): 2 3 5
Enter edge (source destination weight): 3 4 3
Enter starting node: 0
Enter destination node: 4

Shortest distance from 0 to 4 = 7
```
