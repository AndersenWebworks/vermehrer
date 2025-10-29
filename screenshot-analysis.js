const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({
    headless: true,
    args: ['--no-sandbox', '--disable-setuid-sandbox']
  });

  const context = await browser.newContext({
    viewport: { width: 1920, height: 1080 },
    deviceScaleFactor: 1,
  });

  const page = await context.newPage();

  try {
    console.log('Navigating to page...');
    await page.goto('https://vm.andersen-webworks.de/tierliebe-start', {
      waitUntil: 'networkidle',
      timeout: 60000
    });

    console.log('Taking full page screenshot...');
    await page.screenshot({
      path: 'c:\\Andersen\\Webworks\\GitHub\\Webworks\\vermehrer\\screenshot-fullpage.png',
      fullPage: true
    });

    console.log('Taking viewport screenshot...');
    await page.screenshot({
      path: 'c:\\Andersen\\Webworks\\GitHub\\Webworks\\vermehrer\\screenshot-viewport.png',
      fullPage: false
    });

    // Take screenshots at different viewport sizes
    console.log('Taking tablet screenshot...');
    await page.setViewportSize({ width: 768, height: 1024 });
    await page.screenshot({
      path: 'c:\\Andersen\\Webworks\\GitHub\\Webworks\\vermehrer\\screenshot-tablet.png',
      fullPage: true
    });

    console.log('Taking mobile screenshot...');
    await page.setViewportSize({ width: 375, height: 667 });
    await page.screenshot({
      path: 'c:\\Andersen\\Webworks\\GitHub\\Webworks\\vermehrer\\screenshot-mobile.png',
      fullPage: true
    });

    // Get page HTML
    const html = await page.content();
    const fs = require('fs');
    fs.writeFileSync('c:\\Andersen\\Webworks\\GitHub\\Webworks\\vermehrer\\page-content.html', html);

    // Get all computed styles for buttons and key elements
    const elementData = await page.evaluate(() => {
      const data = {
        buttons: [],
        headings: [],
        sections: [],
        images: [],
        issues: []
      };

      // Analyze buttons
      const buttons = document.querySelectorAll('button, .uk-button, a[class*="button"]');
      buttons.forEach((btn, i) => {
        const styles = window.getComputedStyle(btn);
        const rect = btn.getBoundingClientRect();
        data.buttons.push({
          index: i,
          text: btn.textContent.trim().substring(0, 50),
          classes: btn.className,
          width: rect.width,
          height: rect.height,
          padding: styles.padding,
          paddingTop: styles.paddingTop,
          paddingBottom: styles.paddingBottom,
          paddingLeft: styles.paddingLeft,
          paddingRight: styles.paddingRight,
          margin: styles.margin,
          fontSize: styles.fontSize,
          borderRadius: styles.borderRadius,
          backgroundColor: styles.backgroundColor,
          color: styles.color,
          boxShadow: styles.boxShadow,
          border: styles.border,
          display: styles.display,
          textAlign: styles.textAlign,
          lineHeight: styles.lineHeight,
          overflow: styles.overflow,
          textOverflow: styles.textOverflow,
          whiteSpace: styles.whiteSpace
        });
      });

      // Analyze headings
      const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6');
      headings.forEach((h, i) => {
        const styles = window.getComputedStyle(h);
        const rect = h.getBoundingClientRect();
        data.headings.push({
          index: i,
          tag: h.tagName,
          text: h.textContent.trim().substring(0, 100),
          fontSize: styles.fontSize,
          lineHeight: styles.lineHeight,
          fontWeight: styles.fontWeight,
          color: styles.color,
          margin: styles.margin,
          marginTop: styles.marginTop,
          marginBottom: styles.marginBottom,
          textAlign: styles.textAlign,
          width: rect.width,
          overflow: styles.overflow
        });
      });

      // Analyze sections/containers
      const sections = document.querySelectorAll('section, .uk-section, [class*="section"]');
      sections.forEach((section, i) => {
        const styles = window.getComputedStyle(section);
        data.sections.push({
          index: i,
          classes: section.className,
          padding: styles.padding,
          margin: styles.margin,
          backgroundColor: styles.backgroundColor,
          minHeight: styles.minHeight
        });
      });

      // Check for potential visual issues
      document.querySelectorAll('*').forEach((el) => {
        const styles = window.getComputedStyle(el);
        const rect = el.getBoundingClientRect();

        // Check for text overflow
        if (el.scrollWidth > el.clientWidth && el.textContent.trim().length > 0) {
          data.issues.push({
            type: 'text-overflow',
            element: el.tagName,
            classes: el.className,
            text: el.textContent.trim().substring(0, 50),
            scrollWidth: el.scrollWidth,
            clientWidth: el.clientWidth
          });
        }

        // Check for elements outside viewport
        if (rect.left < -10 || rect.right > window.innerWidth + 10) {
          data.issues.push({
            type: 'horizontal-overflow',
            element: el.tagName,
            classes: el.className,
            left: rect.left,
            right: rect.right,
            viewportWidth: window.innerWidth
          });
        }
      });

      return data;
    });

    fs.writeFileSync('c:\\Andersen\\Webworks\\GitHub\\Webworks\\vermehrer\\element-data.json', JSON.stringify(elementData, null, 2));

    console.log('Screenshots and data saved successfully!');

  } catch (error) {
    console.error('Error:', error.message);
    process.exit(1);
  } finally {
    await browser.close();
  }
})();
