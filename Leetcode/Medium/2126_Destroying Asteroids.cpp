class Solution {
public:
    bool asteroidsDestroyed(int mass, vector<int>& asteroids) 
    {
        sort(asteroids.begin(),asteroids.end());
        long Mass = mass;
        for(int i=0;i<asteroids.size();i++)
        {
            if(Mass < asteroids[i])
            {
                return false;
            }
            Mass = Mass + asteroids[i];
        }
        return true;
    }
};
