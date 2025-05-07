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
cd FinanceFlow

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

### **How to Use FinanceFlow**

1️⃣ **Clone the repository**
```sh
git clone https://github.com/Omid2831/theater.git
cd theater
```
