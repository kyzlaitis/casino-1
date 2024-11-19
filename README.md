Download

git clone https://github.com/kyzlaitis/casino-1.git


Nabigate

cd casino-1


Build: 

docker build -t casino .

Run:

docker run -d -p 5678:5678 --name casino-container casino


Observe:

http://localhost:5678
