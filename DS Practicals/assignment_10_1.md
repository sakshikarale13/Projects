# Assignment No: 10.1

## Title
Write a Program to implement Kruskal's algorithm to find the minimum spanning tree of a user defined graph. Use Adjacency Matrix to represent a graph.

## Code

```cpp
#include <iostream>
#include <algorithm>
using namespace std;

struct Edge {
    int src, dest, weight;
    Edge* next;
};

void addEdge(Edge*& head, int s, int d, int w) {
    Edge* newNode = new Edge();
    newNode->src = s;
    newNode->dest = d;
    newNode->weight = w;
    newNode->next = head;
    head = newNode;
}

int findParent(int parent[], int i) {
    while (parent[i] != i) {
        i = parent[i];
    }
    return i;
}

void unionSet(int parent[], int a, int b) {
    int x = findParent(parent, a);
    int y = findParent(parent, b);
    parent[x] = y;
}

void sortEdges(Edge*& head) {
    for (Edge* i = head; i != NULL; i = i->next) {
        for (Edge* j = i->next; j != NULL; j = j->next) {
            if (i->weight > j->weight) {
                swap(i->src, j->src);
                swap(i->dest, j->dest);
                swap(i->weight, j->weight);
            }
        }
    }
}

int main() {
    int n;
    cout << "Enter number of vertices: ";
    cin >> n;

    int graph[20][20];
    cout << "Enter Adjacency Matrix: \n";
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            cin >> graph[i][j];
        }
    }

    Edge* edgeList = NULL;

    // Convert adjacency matrix to edge list (linked list)
    // Only iterate upper triangle to avoid duplicates in undirected graph
    for (int i = 0; i < n; i++) {
        for (int j = i + 1; j < n; j++) {
            if (graph[i][j] != 0) {
                addEdge(edgeList, i, j, graph[i][j]);
            }
        }
    }

    sortEdges(edgeList);

    int parent[20];
    for (int i = 0; i < n; i++) {
        parent[i] = i;
    }

    cout << "\nEdges in Minimum Spanning Tree: \n";
    int edgeCount = 0;
    int totalCost = 0;
    Edge* temp = edgeList;

    while (temp != NULL && edgeCount < n - 1) {
        int u = temp->src;
        int v = temp->dest;

        if (findParent(parent, u) != findParent(parent, v)) {
            cout << u << " - " << v << " : " << temp->weight << endl;
            totalCost += temp->weight;
            unionSet(parent, u, v);
            edgeCount++;
        }
        temp = temp->next;
    }
    
    cout << "Total Minimum Cost = " << totalCost << endl;

    return 0;
}
```

## Output

```text
Enter number of vertices: 4
Enter Adjacency Matrix: 
0 10 6 5
10 0 0 15
6 0 0 4
5 15 4 0

Edges in Minimum Spanning Tree: 
2 - 3 : 4
0 - 3 : 5
0 - 1 : 10
Total Minimum Cost = 19
```
