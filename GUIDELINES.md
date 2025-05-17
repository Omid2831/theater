# theater 

### **Version Control Strategy: GitFlow**

We follow the **GitFlow workflow**, which provides a structured branching strategy for feature development, releases, and hotfixes.

#### **GitFlow Branch Structure**

- **`main` branch** → Contains stable production-ready code.
- **`develop` branch** → Active development happens here.
- **Feature branches** (`feature/feature-name`) → Used for new features.
- **Release branches** (`release/version-number`) → Used to prepare for a new release.
- **Hotfix branches** (`hotfix/fix-name`) → Used for urgent bug fixes in production.

#### **GitFlow Workflow Example**

1️⃣ **Cloning the repository & setting up branches**
```sh
# Clone the repository
git clone https://github.com/Omid2831/theater.git
cd theater

# Set up main and develop branches
git checkout main
git checkout -b develop
```

2️⃣ **Starting a new feature**
```sh
# Create a new feature branch
git checkout -b feature/user-authentication

# Work on the feature, commit changes
git add .
git commit -m "feat: add user authentication module"

# Merge the feature branch back to develop
git checkout develop
git merge feature/user-authentication
```

3️⃣ **Creating a release branch**
```sh
# Create a release branch
git checkout -b release/v1.0.0

# Perform final tests, bug fixes, and optimizations
git commit -m "fix: resolve minor UI issues"

# Merge into main and tag the release
git checkout main
git merge release/v1.0.0
git tag -a v1.0.0 -m "theater v1.0.0 release"
```

4️⃣ **Handling hotfixes**
```sh
# Create a hotfix branch for an urgent bug
git checkout -b hotfix/fix-login-bug

# Fix the issue, commit, and merge into main
git commit -m "fix: resolve login issue"
git checkout main
git merge hotfix/fix-login-bug

# Merge the fix into develop as well
git checkout develop
git merge main
```

---

### **Conventional Commits**
We use **Conventional Commits** for clear and consistent commit messages.

#### **Commit Message Format:**
```sh
type(scope): message
```

#### **Common Types:**
- `feat:` – New feature (e.g., `feat: add budget tracking`)
- `fix:` – Bug fix (e.g., `fix: resolve login issue`)
- `refactor:` – Code refactoring (e.g., `refactor: optimize API calls`)
- `docs:` – Documentation updates (e.g., `docs: update README`)
- `style:` – UI/design improvements (e.g., `style: enhance button UI`)
- `test:` – Adding or updating tests (e.g., `test: add unit test for auth`)
- `chore:` – Maintenance tasks (e.g., `chore: update dependencies`)

Example commit:
```sh
git commit -m "feat(auth): add JWT authentication support"
```
This keeps commit history **clean and meaningful**! 🚀

---

### **How to Use theater **

1️⃣ **Clone the repository**
```sh
git clone https://github.com/Omid2831/theater.git
cd theater
```

Here’s a **Git Command Cheat Sheet** for your theater project, following GitFlow and Conventional Commits:

---

### **Git Command Cheat Sheet**  
*(For GitFlow Workflow + Conventional Commits)*  

#### **1. Basic Setup**  
| Command | Description |
|---------|-------------|
| `git clone https://github.com/Omid2831/theater.git` | Clone the repository |
| `cd theater` | Navigate to the project folder |
| `git checkout main` | Switch to `main` branch |
| `git pull origin main` | Pull latest changes from `main` |

#### **2. Branch Management**  
| Command | Description |
|---------|-------------|
| `git checkout -b develop` | Create and switch to `develop` branch |
| `git checkout -b feature/feature-name` | Create a feature branch (e.g., `feature/ticket-overview`) |
| `git checkout -b release/v1.0.0` | Create a release branch |
| `git checkout -b hotfix/fix-name` | Create a hotfix branch |
| `git branch -a` | List all branches (local + remote) |
| `git branch -d branch-name` | Delete a local branch |

#### **3. Making Changes**  
| Command | Description |
|---------|-------------|
| `git add .` | Stage all changes |
| `git add file-name` | Stage specific files |
| `git commit -m "feat(auth): add login form"` | Commit with Conventional Commit format |
| `git commit --amend` | Edit the last commit message |

#### **4. Syncing with Remote**  
| Command | Description |
|---------|-------------|
| `git push origin branch-name` | Push a branch to remote (e.g., `git push origin feature/ticket-overview`) |
| `git pull origin branch-name` | Pull latest changes from a remote branch |
| `git fetch --all` | Fetch all remote branches (no merge) |

#### **5. Merging & Cleanup**  
| Command | Description |
|---------|-------------|
| `git checkout develop` | Switch to `develop` branch |
| `git merge feature/feature-name` | Merge a feature branch into `develop` |
| `git merge --no-ff feature/feature-name` | Merge with a commit (avoid fast-forward) |
| `git rebase develop` | Rebase current branch onto `develop` |
| `git push origin --delete branch-name` | Delete a remote branch |

#### **6. Release & Hotfix Workflow**  
| Command | Description |
|---------|-------------|
| `git checkout -b release/v1.0.0 develop` | Start a release branch |
| `git checkout main` <br> `git merge release/v1.0.0` | Merge release into `main` |
| `git tag -a v1.0.0 -m "Stable release"` | Tag the release |
| `git push origin --tags` | Push tags to remote |
| `git checkout hotfix/fix-name` <br> `git merge hotfix/fix-name main` | Merge hotfix into `main` and `develop` |

#### **7. Undoing Changes**  
| Command | Description |
|---------|-------------|
| `git reset --hard HEAD` | Discard all local changes |
| `git checkout -- file-name` | Revert a file to last commit |
| `git revert commit-hash` | Create a new commit undoing a previous commit |

---

### **Example Workflow**  
1. **Start a new feature:**  
   ```sh
   git checkout develop
   git checkout -b feature/ticket-overview
   git push origin feature/ticket-overview
   ```

2. **After committing changes:**  
   ```sh
   git add .
   git commit -m "feat(tickets): add overview table"
   git push origin feature/ticket-overview
   ```

3. **Merge to `develop`:**  
   ```sh
   git checkout develop
   git merge feature/ticket-overview
   git push origin develop
   ```

---

### **Pro Tips**  
✅ **Always pull before pushing** to avoid conflicts:  
```sh
git pull origin branch-name
```  

✅ **Use `--no-ff` for merges** to preserve branch history:  
```sh
git merge --no-ff feature/awesome-feature
```  

✅ **Write clear commit messages** following Conventional Commits.  

✅ **Delete stale branches** after merging:  
```sh
git branch -d feature/old-feature
git push origin --delete feature/old-feature
```  

--- 

Need a visual? Here’s a **GitFlow diagram**:  
```
main        → Production-ready code (stable)
develop     → Integration branch (latest features)
feature/*   → New features (branched from `develop`)
release/*   → Prep for releases (branched from `develop`)
hotfix/*    → Urgent fixes (branched from `main`)
```

Let me know if you’d like a deeper dive into any command! 🎭🔧
