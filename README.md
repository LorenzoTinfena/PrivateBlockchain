# PrivateBlockchain
Custom private blockchain with PHP implementation (using a relation DBMS).
# Faetures of this custom blockchain
-Centralization
-Complete transparency
-Complete proof of work
-ability to hide/show block values

The blockchain is stored in a central server, clients can only view the complete blockchain and add a block.
When a client add a block, he can choose between show immediately the value or not, in any case clients can hide/show
their values in their block in any moment.
The value in a block is hashed and stored in a variable called ValueHashed, which is always shown.

# Block format
    Value: text of the value
    ValueHashed: sha256(Value)
    TimeStamp: date of the timestamp of the block
    Hash: sha256(ValueHashed + TimeStamp + prev Hash)
